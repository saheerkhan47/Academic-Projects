# Generated by Django 4.1 on 2024-02-29 10:15

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('customerapp', '0006_remove_tbl_payment_book_tbl_payment_bookid'),
    ]

    operations = [
        migrations.RenameField(
            model_name='tbl_cart',
            old_name='bill_no',
            new_name='billno',
        ),
    ]
