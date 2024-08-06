import smtplib
import string
from email.message import EmailMessage


from django.http import HttpResponse
from django.shortcuts import render, redirect
from guestapp.models import Tbl_login
from guestapp.models import Tbl_customer
from adminapp.models import Tbl_district
from adminapp.models import Tbl_location
import random

def index(request):
    return render(request, "guest/index.html")


def login(request):
    # return HttpResponse("haii")
    if request.method == "POST":
        username = request.POST.get('username')
        password = request.POST.get('password')
        if Tbl_login.objects.filter(username=username, password=password).exists():
            lob = Tbl_login.objects.get(username=username, password=password)
            request.session['username'] = lob.username
            request.session['loginid'] = lob.loginid
            if lob.role == "Admin":
                return redirect("/adminapp/index")
            elif lob.role == "customer":
                return redirect("/customerapp/cindex")
            else:
                return redirect(request, 'guest/login.html', {'error': 'incorrect Username and Password!'})
        else:
            return render(request, 'guest/login.html', {'error': 'incorrect Username and Password!'})
    else:

        return render(request, "guest/login.html")


def customerreg(request):
    if request.method == "POST":
        l = Tbl_login()
        l.username = request.POST.get("username")
        l.password = request.POST.get("password")
        l.role = "customer"
        l.save()
        t = Tbl_customer()
        t.cust_name = request.POST.get("custname")
        t.cust_email = request.POST.get("email")
        t.cust_contact = request.POST.get("phnumber")
        t.cust_address = request.POST.get("custadress")
        t.cust_pincode = request.POST.get("pincode")
        t.cust_gender = request.POST.get("gender")

        t.loc_id = Tbl_location.objects.get(loc_id=request.POST.get("loc_name"))

        t.loginid = l
        t.save()
        return HttpResponse("<script>alert('Successfully registered');window.location='/login';</script>")
    district = Tbl_district.objects.all()
    location = Tbl_location.objects.all()
    return render(request, 'guest/customerreg.html',
                  {'district': district, 'location': location})

def forgotpassword(request):
    if request.method == 'POST':
        username = request.POST.get("name")
        if Tbl_login.objects.filter(username=username).exists():
            login_instance = Tbl_login.objects.get(username=username)
            login_id = login_instance.loginid
            customer_instance = Tbl_customer.objects.get(loginid_id=login_id)
            email = customer_instance.cust_email
            customer_name = customer_instance.cust_name

            characters = string.ascii_letters + string.digits
            random_password = ''.join(random.choice(characters) for _ in range(8))

            login_instance.password = random_password
            login_instance.save()

            msg = EmailMessage()
            msg.set_content(f'Hi {customer_name}, your new password to login is {random_password}')
            msg['Subject'] = "Forgot Password?"
            msg['From'] = 'saheerjacky786@gmail.com'
            msg['To'] = [email]
            with smtplib.SMTP_SSL('smtp.gmail.com', 465) as smtp:
                smtp.login('saheerjacky786@gmail.com', 'bjzu gbit dtac ecla')
                smtp.send_message(msg)
            return HttpResponse("<script>alert('Login with new password in your email');window.location='/login';</script>")
        return HttpResponse("<script>alert('No data found');window.location='/forgotpassword';</script>")
    return render(request, "guest/forgotpassword.html")



# Create your views here.
