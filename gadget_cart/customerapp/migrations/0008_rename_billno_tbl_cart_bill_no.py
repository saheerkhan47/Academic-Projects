# Generated by Django 4.1 on 2024-02-29 10:17

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('customerapp', '0007_rename_bill_no_tbl_cart_billno'),
    ]

    operations = [
        migrations.RenameField(
            model_name='tbl_cart',
            old_name='billno',
            new_name='bill_no',
        ),
    ]
