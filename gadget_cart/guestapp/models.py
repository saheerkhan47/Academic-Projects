from django.db import models
from adminapp.models import Tbl_location


class Tbl_login(models.Model):
    loginid = models.AutoField(primary_key=True)
    username = models.CharField(max_length=25)
    password = models.CharField(max_length=25)
    role = models.CharField(max_length=25)


class Tbl_customer(models.Model):
    cust_id = models.AutoField(primary_key=True)
    cust_name = models.CharField(max_length=25)
    cust_address = models.CharField(max_length=50)
    cust_email = models.CharField(max_length=25)
    cust_gender = models.CharField(max_length=25,null=True)
    cust_contact = models.CharField(max_length=15, blank=True, null=True)
    cust_pincode = models.IntegerField(blank=True, null=True)
    loc_id = models.ForeignKey(Tbl_location, on_delete=models.CASCADE)
    loginid = models.ForeignKey(Tbl_login, on_delete=models.CASCADE, null=True)
# Create your models here.
