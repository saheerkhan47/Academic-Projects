# Generated by Django 4.1 on 2024-01-30 10:03

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('adminapp', '0006_alter_tbl_product_pro_price_and_more'),
        ('guestapp', '0008_tbl_customer_cust_gender'),
        ('customerapp', '0001_initial'),
    ]

    operations = [
        migrations.RenameModel(
            old_name='cart',
            new_name='Tbl_cart',
        ),
    ]