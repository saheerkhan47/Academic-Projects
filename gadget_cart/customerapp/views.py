import smtplib
import string
from email.message import EmailMessage
from random import random

from django.db.models import F, ExpressionWrapper, Sum, DecimalField, Max
from django.http import HttpResponse, JsonResponse, request
from django.shortcuts import render, redirect
from django.views.decorators.cache import cache_control

from adminapp.models import Tbl_category, Tbl_district, Tbl_location
from adminapp.models import Tbl_product
from customerapp.models import Tbl_cart, Tbl_Book, Tbl_Payment
from guestapp.models import Tbl_login, Tbl_customer


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def cindex(request):
    if 'loginid' in request.session:
        cartcount = Tbl_cart.objects.filter(cust_id__loginid=request.session['loginid'], status='cart').count()
        request.session['cartcount'] = cartcount
        category = Tbl_category.objects.all()
        logid = request.session.get('loginid')
        logname = request.session.get('username')
        if logid:
            return render(request, "customer/index.html",
                          {'Loginid': logid, 'Logname': logname, 'uname': request.session['username'],
                           'category': category})
        else:
            return HttpResponse(
                "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


def Error(request):
    return render(request, "Admin/error.html")


def logout(request):
    if "loginid" in request.session:
        del request.session["loginid"]
        del request.session['username']
        return redirect('/')


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def custprofile(request):
    if 'loginid' in request.session:
        # login = Tbl_login.objects.filter(loginid=id)
        customer = Tbl_customer.objects.get(loginid_id=request.session['loginid'])
        return render(request, "customer/custprofile.html", {'customer': customer})
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def viewproduct(request, id):
    if 'loginid' in request.session:
        product = Tbl_product.objects.filter(cate_id=id)
        category = Tbl_category.objects.all()
        return render(request, "customer/viewproduct.html", {'product': product, 'category': category})
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def quickview(request, id):
    if "loginid" in request.session:
        product = Tbl_product.objects.filter(pro_id=id)
        category = Tbl_category.objects.all()
        return render(request, "customer/quickview.html", {'product': product, 'category': category})
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def cartview(request):
    if "loginid" in request.session:
        cart = Tbl_cart.objects.filter(
            status='cart',
            cust_id__loginid=request.session['loginid']
        )

        grand_total = Tbl_cart.objects.filter(status='cart', cust_id__loginid=request.session['loginid'],
                                              item_qty__lte=F('pro_id__pro_stoke')).aggregate(
            grand_total=Sum(ExpressionWrapper(F('item_qty') * F('pro_id__pro_price'), output_field=DecimalField())))[
            'grand_total']
        cartcount = Tbl_cart.objects.filter(cust_id__loginid=request.session['loginid'], status='cart').count()

        request.session['cartcount'] = cartcount
        request.session['grand_total'] = str(grand_total)
        p_count = Tbl_cart.objects.filter(cust_id__loginid=request.session['loginid'], status='cart',
                                          item_qty__lte=F('pro_id__pro_stoke')).count()
        # return HttpResponse(str(p_count))
        return render(request, 'customer/cartview.html', {'p_count': p_count, 'grand_total': grand_total, 'cart': cart,
                                                          'cartcount': request.session['cartcount']})
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


def deletecart(request, id):
    dob = Tbl_cart.objects.get(cart_id=id)
    dob.delete()
    return HttpResponse("<script>alert('successfully Deleted..');window.location='/customerapp/cartview'</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def cartbuy(request, id):
    if "loginid" in request.session:
        if request.method == "POST":

            if request.POST.get('cart') == "Add to cart":
                # return HttpResponse("haii")
                qty = request.POST.get('qty')
                cob = Tbl_cart()
                cob.item_qty = qty
                # return HttpResponse(int(request.session['loginid']))
                cob.cust_id = Tbl_login.objects.get(loginid=int(request.session['loginid']))
                pr = Tbl_product.objects.get(pro_id=id)
                cob.pro_id = pr
                cob.status = 'cart'
                # return HttpResponse(str(pr.pro_stoke))
                if int(qty) > int(pr.pro_stoke):
                    return HttpResponse("<script> alert('Stock Exceeds." + str(
                        pr.pro_stoke) + " items in Stock..');window.location='/customerapp/quickview/" + id + "';</script>")
                else:
                    cart = Tbl_cart.objects.filter(pro_id=id, cust_id=request.session['loginid'],
                                                   status='cart').values()
                    if not cart.exists():
                        cob.save()
                    else:
                        for c in cart:
                            qty = int(qty) + int(c['item_qty'])
                            Tbl_cart.objects.filter(cust_id=request.session['loginid'], status="cart",
                                                    pro_id=id).update(
                                item_qty=qty)
                            cartcount = Tbl_cart.objects.filter(cust_id__loginid=request.session['loginid'],
                                                                status='cart').count()
                            request.session['cartcount'] = cartcount
                    return HttpResponse(
                        "<script> alert('Successfully Added to Cart...');window.location='/customerapp/quickview/" + id + "'; </script>")
            else:

                qty = request.POST.get('qty')
                pr = Tbl_product.objects.get(pro_id=id)
                if int(qty) > int(pr.pro_stoke):
                    return HttpResponse("<script>alert('Stock Exceeds." + str(
                        pr.pro_stoke) + " items in Stock..');window.location='/customerapp/quickview/" + id + "';</script>")

                else:

                    request.session['grand_total'] = int(qty) * pr.pro_price
                    cob = Tbl_cart()
                    cob.item_qty = int(qty)
                    cob.status = "buy"
                    cob.cust_id = Tbl_login.objects.get(loginid=request.session['loginid'])
                    pr = Tbl_product.objects.get(pro_id=id)
                    cob.pro_id = pr
                    cob.save()
                    request.session['cartid'] = cob.cart_id
                    request.session['pid'] = id
                    cdata = Tbl_customer.objects.get(loginid__loginid=request.session['loginid'])
                    return render(request, 'customer/payment.html',
                                  {'grand_total': request.session['grand_total'], 'qty': qty,
                                   'cartcount': request.session['cartcount'], "msg": "buynow", 'cdata': cdata})
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


def updateqty(request):
    qty = request.POST.get("qty")
    caid = request.POST.get("cid")
    cob = Tbl_cart.objects.get(cart_id=caid)
    cob.item_qty = qty
    cob.save()
    i = 1
    # Print the SQL query generated by Django
    return JsonResponse(i, safe=False)


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def makepayment(request):
    if "loginid" in request.session:
        if request.method == "POST":
            grandtotal = request.POST.get('gtotal')
            cdata = Tbl_customer.objects.get(loginid__loginid=request.session['loginid'])
            return render(request, 'customer/payment.html',
                          {'grand_total': grandtotal, 'cartcount': request.session['cartcount'], 'cdata': cdata})
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def placeorder(request):
    if "loginid" in request.session:
        if request.method == "POST":

            bob = Tbl_Book()
            bob.TotalAmount = request.POST.get('gtotal')
            bob.cust_id = Tbl_login.objects.get(loginid=request.session['loginid'])
            bob.status = 'Booked'
            max_bill = Tbl_Book.objects.aggregate(max_value=Max('billno'))['max_value']
            # Check if there are existing bills
            if max_bill is not None:
                new_billno = max_bill + 1
            else:
                new_billno = 1

            bob.billno = new_billno
            # return HttpResponse(bob.billno)
            bob.save()
            pob = Tbl_Payment()
            pob.status = "paid"
            pob.TotalAmount = float(request.POST.get('gtotal'))
            pob.book_id = bob.BookId
            pob.del_address = request.POST.get('Address')
            pob.save()

            if 'cartid' in request.session:

                cob = Tbl_cart.objects.get(cart_id=int(request.session['cartid']))
                cob.bill_no = new_billno
                cob.status = 'Booked'
                cob.save()
                del request.session['cartid']
                id = request.session['pid']
                del request.session['pid']
                product = Tbl_cart.objects.filter(bill_no=new_billno).select_related('pro_id')
                for p in product:
                    stock = int(p.pro_id.pro_stoke) - int(p.item_qty)
                    Tbl_product.objects.filter(pro_id=p.pro_id.pro_id).update(
                        pro_stoke=stock)
                return HttpResponse("<script>alert('Successfully Ordered...Your Bill No is " + str(
                    new_billno) + "');window.location='/customerapp/cindex/';</script>")
            else:
                Tbl_cart.objects.filter(cust_id=request.session['loginid'], status='cart').update(
                    bill_no=new_billno,
                    status='Booked'
                )
                product = Tbl_cart.objects.filter(bill_no=new_billno).select_related('pro_id')
                for p in product:
                    stock = int(p.pro_id.pro_stoke) - int(p.item_qty)
                    Tbl_product.objects.filter(pro_id=p.pro_id.pro_id).update(
                        pro_stoke=stock
                    )
                cartcount = Tbl_cart.objects.filter(cust_id=request.session['loginid'], status='cart').count()
                request.session['cartcount'] = cartcount
                return HttpResponse("<script>alert('Successfully Ordered...Your Bill No is " + str(
                    new_billno) + "');window.location='/customerapp/cartview/';</script>")
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def editprofile(request):
    if "loginid" in request.session:
        if request.method == 'POST':
            customer = Tbl_customer.objects.get(loginid_id=request.session['loginid'])
            customer.cust_name = request.POST.get('customername')
            customer.cust_email = request.POST.get('email')
            customer.cust_address = request.POST.get('address')
            customer.cust_contact = request.POST.get('contact')
            customer.cust_pincode = request.POST.get('pincode')

            customer.loc_id = Tbl_location.objects.get(loc_id=request.POST.get('location'))
            customer.save()
            return HttpResponse(
                "<script>alert('Successfully updated...');window.location='/customerapp/custprofile'</script>")
        customer = Tbl_customer.objects.get(loginid_id=request.session['loginid'])
        district = Tbl_district.objects.all()
        location = Tbl_location.objects.filter(dist_id__dist_id=customer.loc_id.dist_id.dist_id)
        return render(request, 'customer/editprofile.html',
                      {'customer': customer, 'district': district, 'location': location});
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")


def filllocation(request):
    id = int(request.POST.get("did"))
    location = Tbl_location.objects.filter(dist_id=id).values()
    return JsonResponse(list(location), safe=False)


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def changepassword(request):
    if "loginid" in request.session:
        if request.method == 'POST':
            uname = request.POST.get("username")
            password = request.POST.get("password")
            newpwd = request.POST.get("newpwd")
            connewpwd = request.POST.get("connewpwd")
            if Tbl_login.objects.filter(username=uname, password=password).exists():
                lo = Tbl_login.objects.get(username=uname, password=password)
                if newpwd == connewpwd:
                    lo.password = newpwd
                    lo.save()
                    return HttpResponse(
                        "<script>alert('Successfully updated!!');window.location='/customerapp/cindex/'</script>")
                return HttpResponse(
                    "<script>alert('Password Mismatch!!');window.location='/customerapp/changepassword'</script>")
            return HttpResponse(
                "<script>alert('Invalid Username or Password!!');window.location='/customerapp/changepassword'</script>")
        return render(request, "customer/changepassword.html")
    else:
        return HttpResponse(
            "<script>alert('Authentication Required Please loginfirst');window.location='/login';</script>")



@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def orderview(request):
    custid = request.session.get('loginid')
    book = Tbl_Book.objects.filter(cust_id=custid).order_by('-BookId')[:10]
    return render(request, 'customer/orderview.html', {'book': book})


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
def billview(request, billno):
    data = Tbl_cart.objects.filter(bill_no=billno)
    grand_total = Tbl_cart.objects.filter(bill_no=billno).aggregate(
        grand_total=Sum(ExpressionWrapper(F('item_qty') * F('pro_id__pro_price'), output_field=DecimalField())))[
        'grand_total']
    customer = Tbl_cart.objects.select_related('cust_id__tbl_customer__loginid').filter(bill_no=billno).values(
        'cust_id__tbl_customer__loginid', 'cust_id__tbl_customer__cust_name', 'cust_id__tbl_customer__cust_email',
        'cust_id__tbl_customer__cust_contact').distinct()
    # return HttpResponse(customer)
    address = Tbl_Book.objects.get(billno=billno)
    deladdress = Tbl_Payment.objects.get(book_id=address.BookId)
    # return HttpResponse(address.bookid)
    return render(request, "customer/billview.html",
                  {'data': data, 'grandtotal': grand_total, 'customer': customer, 'deladdress': deladdress})
