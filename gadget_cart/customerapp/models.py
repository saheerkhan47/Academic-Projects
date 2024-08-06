from django.db import models
from adminapp.models import Tbl_product
from guestapp.models import Tbl_customer, Tbl_login


class Tbl_cart(models.Model):
    cart_id = models.AutoField(primary_key=True)
    pro_id = models.ForeignKey(Tbl_product, on_delete=models.CASCADE)
    cust_id = models.ForeignKey(Tbl_login, on_delete=models.CASCADE, null=True)
    item_qty = models.BigIntegerField()
    bill_no = models.IntegerField(null=True)
    status = models.CharField(max_length=50)


class Tbl_Book(models.Model):
    BookId = models.AutoField(primary_key=True)
    booking_date = models.DateField(auto_now_add=True)
    TotalAmount = models.FloatField()
    cust_id = models.ForeignKey(Tbl_login, on_delete=models.CASCADE)
    billno = models.IntegerField(default=100)
    status = models.CharField(max_length=50)


class Tbl_Payment(models.Model):
    PaymentId = models.AutoField(primary_key=True)
    book= models.ForeignKey(Tbl_Book, on_delete=models.CASCADE,null=True)
    status = models.CharField(max_length=50)
    TotalAmount = models.FloatField()
    del_address = models.CharField(max_length=250,null=True)


# Create your models here.
