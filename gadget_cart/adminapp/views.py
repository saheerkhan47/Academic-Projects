import smtplib
from email.message import EmailMessage

import xlwt
from django.db.models import ExpressionWrapper, Sum, DecimalField, F, Count
from django.http import HttpResponse, JsonResponse
from django.shortcuts import render, redirect
from django.views import View

from adminapp.models import Tbl_district
from adminapp.models import Tbl_location
from adminapp.models import Tbl_category
from adminapp.models import Tbl_product
from customerapp.models import Tbl_Book, Tbl_cart, Tbl_Payment
from guestapp.models import Tbl_customer
from django.views.decorators.cache import cache_control


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def index(request):
    logid = request.session.get('loginid')
    logname = request.session.get('username')
    if logid:
        return render(request, "admin/index.html", {'Loginid': logid, 'Logname': logname})
    else:
        return HttpResponse( "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")

def Error(request):
  return render(request, "Admin/error.html")


def logout(request):
 if "loginid" in request.session:
    del request.session["loginid"]
    del request.session['username']
    return redirect('/')


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def district(request):
    if request.method == "POST":
        dob = Tbl_district()
        dob.dist_name = request.POST.get("districtname")
        if Tbl_district.objects.filter(dist_name=request.POST.get('districtname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/district';</script>")
        else:
            dob.save()
            return HttpResponse("<script>alert('succesfully inserted');window.location='/adminapp/district';</script>")
    else:
        district = Tbl_district.objects.all()
        return render(request, 'admin/districtreg.html', {'district': district})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def location(request):
    if request.method == "POST":
        lob = Tbl_location()
        lob.loc_name = request.POST.get("locationname")
        if Tbl_location.objects.filter(loc_name=request.POST.get('locationname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/location';</script>")
        else:
            lob.dist_id = Tbl_district.objects.get(dist_id=request.POST.get('dist_id'))
            lob.save()
            return HttpResponse("<script>alert('succesfully inserted');window.location='/adminapp/location'</script>")
    else:
        district = Tbl_district.objects.all()
        row = Tbl_district.objects.first()
        loc = Tbl_location.objects.filter(dist_id=row.dist_id)
        return render(request, 'admin/locationreg.html', {'district': district, 'loc': loc, 'row': row})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def category(request):
    if request.method == "POST":
        dob = Tbl_category()
        dob.cate_name = request.POST.get("categoryname")
        dob.cate_image = request.FILES["categoryimage"]
        if Tbl_category.objects.filter(cate_name=request.POST.get('categoryname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/category';</script>")
        else:
            dob.save()
            return HttpResponse("<script>alert('succesfully inserted');window.location='/adminapp/category';</script>")
    else:
        category = Tbl_category.objects.all()
        return render(request, 'admin/categoryreg.html', {'category': category})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def editdistrict(request, id):
    if request.method == "POST":
        cob = Tbl_district.objects.get(dist_id=id)
        cob.dist_name = request.POST.get('districtname')
        if Tbl_district.objects.filter(dist_name=request.POST.get('districtname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/district';</script>")
        else:
            cob.save()
        return HttpResponse("<script>alert('successfully updated..');window.location='/adminapp/district'</script>")
    else:
        district = Tbl_district.objects.get(dist_id=id)
        return render(request, 'admin/editdistrict.html', {'district': district})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def deletedistrict(request, id):
    dob = Tbl_district.objects.get(dist_id=id)
    dob.delete()
    return HttpResponse("<script>alert('successfully Deleted..');window.location='/adminapp/district'</script>")


def editlocation(request, id):
    if request.method == "POST":
        cob = Tbl_location.objects.get(loc_id=id)
        cob.loc_name = request.POST.get('locationname')
        if Tbl_location.objects.filter(loc_name=request.POST.get('locationname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/location';</script>")
        else:
            cob.dist_id = Tbl_district.objects.get(dist_id=request.POST.get('dist_id'))
            cob.save()
            return HttpResponse("<script>alert('successfully updated..');window.location='/adminapp/location'</script>")
    else:
        location = Tbl_location.objects.get(loc_id=id)
        district = Tbl_district.objects.all()
        return render(request, 'admin/editlocation.html', {'location': location, 'district': district})


def deletelocation(request, id):
    dob = Tbl_location.objects.get(loc_id=id)
    dob.delete()
    return HttpResponse("<script>alert('successfully Deleted..');window.location='/adminapp/location'</script>")


def filllocation(request):
    did = int(request.POST.get("did"))
    location = Tbl_location.objects.filter(dist_id=did).values()
    return JsonResponse(list(location), safe=False)


def fillproduct(request):
    did = int(request.POST.get("did"))
    product = Tbl_product.objects.filter(cate_id=did).values()
    return JsonResponse(list(product), safe=False)


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def deletecategory(request, id):
    dob = Tbl_category.objects.get(cate_id=id)
    dob.delete()
    return HttpResponse("<script>alert('successfully Deleted..');window.location='/adminapp/category'</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def editcategory(request, id):
    if request.method == "POST":
        cob = Tbl_category.objects.get(cate_id=id)
        cob.cate_name = request.POST.get('categoryname')
        if len(request.FILES) == 0:
            cob.cate_image = request.POST.get('imageold')
        else:
            cob.cate_image = request.FILES['imagenew']
        if Tbl_category.objects.filter(cate_name=request.POST.get('categoryname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/category';</script>")
        else:
            cob.save()
            return HttpResponse("<script>alert('successfully updated..');window.location='/adminapp/category'</script>")

    else:
        category = Tbl_category.objects.get(cate_id=id)
        return render(request, 'admin/editcategory.html', {'category': category})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def product(request):
    if request.method == "POST":
        dob = Tbl_product()
        dob.pro_name = request.POST.get("productname")
        dob.pro_stoke = request.POST.get("productstoke")
        dob.pro_price = request.POST.get("productprice")
        dob.pro_des = request.POST.get("description")
        dob.pro_image = request.FILES["productimage"]
        if Tbl_product.objects.filter(pro_name=request.POST.get('productname')).exists():
            return HttpResponse("<script>alert('Alredy Exists..');window.location='/adminapp/product';</script>")
        else:
            dob.cate_id = Tbl_category.objects.get(cate_id=request.POST.get('cate_id1'))
            dob.save()
            return HttpResponse("<script>alert('succesfully inserted');window.location='/adminapp/product';</script>")
    else:
        category = Tbl_category.objects.all()
        row = Tbl_category.objects.first()
        pro = Tbl_product.objects.filter(cate_id=row.cate_id)
        return render(request, 'admin/productreg.html',
                      {'product': product, 'category': category, 'pro': pro, 'row': row})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def deleteproduct(request, id):
    dob = Tbl_product.objects.get(pro_id=id)
    dob.delete()
    return HttpResponse("<script>alert('successfully Deleted..');window.location='/adminapp/product'</script>")

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def editproduct(request, id):
    if request.method == "POST":
        cob = Tbl_product.objects.get(pro_id=id)
        cob.pro_name = request.POST.get('productname')
        cob.pro_stoke = request.POST.get('productstoke')
        cob.pro_price = request.POST.get('productprice')
        cob.pro_des = request.POST.get('description')
        # cob.pro_id = Tbl_product.objects.get(pro_id=request.POST.get('pro_id'))
        if len(request.FILES) == 0:
            cob.pro_image = request.POST.get('imageold')
        else:
            cob.pro_image = request.FILES['imagenew']
        cob.save()
        return HttpResponse("<script>alert('successfully updated..');window.location='/adminapp/product'</script>")
    else:
        product = Tbl_product.objects.get(pro_id=id)
        category = Tbl_category.objects.all()
        return render(request, 'admin/editproduct.html', {'product': product, 'category': category})


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def orderdetails(request):
    return render(request, 'admin/orderdetails.html')


def fillbillno(request):
    did = request.POST.get("did")
    billno = Tbl_Book.objects.filter(booking_date=did, status="Booked").values()
    return JsonResponse(list(billno), safe=False)

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def billdetails(request, billno):
    data = Tbl_cart.objects.filter(bill_no=billno)
    grand_total = Tbl_cart.objects.filter(bill_no=billno).aggregate(
        grand_total=Sum(ExpressionWrapper(F('item_qty') * F('pro_id__pro_price'), output_field=DecimalField())))[
        'grand_total']
    customer = Tbl_cart.objects.select_related('cust_id__tbl_customer__loginid').filter(bill_no=billno).values(
        'cust_id__tbl_customer__loginid', 'cust_id__tbl_customer__cust_name',
        'cust_id__tbl_customer__cust_email', 'cust_id__tbl_customer__cust_contact').distinct()
    address = Tbl_Book.objects.get(billno=billno)
    de_address = Tbl_Payment.objects.get(book_id=address.BookId)

    return render(request, 'admin/billdetails.html',
                  {'data': data, 'grandtotal': grand_total, 'customer': customer, 'de_address': de_address})

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def categorypie(request):
    labels = []
    data = []

    queryset = Tbl_product.objects.values('cate_id__cate_name').annotate(total_cate=Count('pro_id'))
    for s in queryset:
        labels.append(s['cate_id__cate_name'])
        data.append(s['total_cate'])

    return render(request, 'admin/categorypie.html', {
        'labels': labels,
        'data': data,
    })


def sendmail(request):
    # subject = 'welcome to Sathisoft'
    # message = 'Hi , thank you for registering in Santhisoft.'
    # email="nijamicheal09@gmail.com"
    # email_from = settings.EMAIL_HOST_USER
    # recipient_list = [email, ]
    # #yag=yagmail.SMTP('nijamicheal09@gmail.com')
    #
    # send_mail(subject, message, email_from, ["nijamicheal09@gmail.com",])
    cid = request.POST.get('cid')
    # return HttpResponse(cid)
    msg = EmailMessage()
    adate = request.POST.get('sdate')
    data = 'Your orders will arrive on' + adate
    msg.set_content(data)
    msg['Subject'] = "Arriving Date"
    msg['from'] = 'saheerjacky786@gmail.com'
    obj = Tbl_customer.objects.get(loginid_id=cid)
    msg['To'] = obj.cust_email
    with smtplib.SMTP_SSL('smtp.gmail.com', 465) as smtp:
        smtp.login('saheerjacky786@gmail.com', 'bjzu gbit dtac ecla')
        smtp.send_message(msg)

    return HttpResponse("<script>alert('send');</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def dateexcel(request):
    return render(request, 'admin/dateexcel.html')


class ExportExcelStudent(View):
    def post(self, request):
        fdate = request.POST.get('fdate')
        tdate = request.POST.get('tdate')
        # return HttpResponse(fdate)
        response = HttpResponse(content_type='application/ms-excel')
        response['Content-Disposition'] = 'attachment; filename="productdetails.xls"'

        wb = xlwt.Workbook(encoding='utf-8')
        ws = wb.add_sheet('Sheet1')

        # Define the column headings
        row_num = 0
        columns = ['Product Name', 'Total Quantity Purchased']
        for col_num, column_title in enumerate(columns):
            ws.write(row_num, col_num, column_title)

        # Query the data from your model, and write it to the worksheet
        details = Tbl_Book.objects.filter(booking_date__range=(fdate, tdate))
        # return HttpResponse(list(details))
        product_quantities = {}

        # Calculate total quantity for each product within the date range
        for detail in details:
            cart_items = Tbl_cart.objects.filter(bill_no=detail.billno)
            for cart_item in cart_items:
                product_name = cart_item.pro_id.pro_name
                item_quantity = cart_item.item_qty
                product_quantities[product_name] = product_quantities.get(product_name, 0) + item_quantity

        # Write data to the worksheet
        for product_name, total_quantity in product_quantities.items():
            row_num += 1
            ws.write(row_num, 0, product_name)
            ws.write(row_num, 1, total_quantity)

        wb.save(response)
        return response

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def locationpie(request):
    labels = []
    data = []

    queryset = Tbl_location.objects.values('dist_id__dist_name').annotate(total_cate=Count('loc_id'))
    for s in queryset:
        labels.append(s['dist_id__dist_name'])
        data.append(s['total_cate'])

    return render(request, 'admin/locationpie.html', {
        'labels': labels,
        'data': data,
    })


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def loccustpie(request):
    labels = []
    data = []

    queryset = Tbl_location.objects.values('dist_id__dist_name').annotate(total_customers=Count('tbl_customer'))

    for entry in queryset:
        labels.append(entry['dist_id__dist_name'])
        data.append(entry['total_customers'])

    return render(request, 'admin/loccustpie.html', {
        'labels': labels,
        'data': data,
    })


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def proexcel(request):
    return render(request, 'admin/proexcel.html')

class ExportExcelCustomer(View):
    def post(self, request):
        response = HttpResponse(content_type='application/ms-excel')
        response['Content-Disposition'] = 'attachment; filename="customerdetails.xls"'

        wb = xlwt.Workbook(encoding='utf-8')
        ws = wb.add_sheet('Sheet1')

        # Define the column headings
        row_num = 0
        columns = ['Name', 'Address', 'Contact', 'Email']
        for col_num, column_title in enumerate(columns):
            ws.write(row_num, col_num, column_title)

        # Query the data from your model, and write it to the worksheet
        queryset = Tbl_customer.objects.all().values_list('cust_name', 'cust_address', 'cust_contact','cust_email')

        # Write data to the worksheet
        for row in queryset:
            row_num += 1
            for col_num, cell_value in enumerate(row):
                ws.write(row_num, col_num, cell_value)

        wb.save(response)
        return response


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def custdetails(request):
    return render(request, 'admin/customerexel.html')


def product_pie(request):
    labels = []
    data = []

    queryset = Tbl_cart.objects.filter(status='Booked').values('pro_id__pro_name').annotate(total_product=Count('pro_id')).order_by('-total_product')[:5]
    for s in queryset:
        labels.append(s['pro_id__pro_name'])
        data.append(s['total_product'])

    return render(request, 'admin/product_pie.html', {
        'labels': labels,
        'data': data
    })

@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def location_customers_pie(request):
    labels = []
    data = []

    queryset = Tbl_cart.objects.select_related('cust_id__tbl_customer__loginid').filter(status='Booked').values('cust_id__tbl_customer__loc_id__loc_name').annotate(total_customer=Count('cust_id')).order_by('-total_customer')[:5]
    for s in queryset:
        labels.append(s['cust_id__tbl_customer__loc_id__loc_name'])
        data.append(s['total_customer'])

    return render(request, 'admin/location_customers_pie.html', {
        'labels': labels,
        'data': data
    })

def sendmail(request,id):
    pob=Tbl_Payment.objects.get(PaymentId=id)
    pob.status="Shipped"
    pob.save()
    return HttpResponse("<script>alert('Status changed to shipped');window.location='/adminapp/orderdetails';</script>")




