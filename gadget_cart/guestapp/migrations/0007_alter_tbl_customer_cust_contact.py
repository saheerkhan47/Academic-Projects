# Generated by Django 4.1 on 2024-01-24 14:58

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('guestapp', '0006_alter_tbl_customer_cust_contact'),
    ]

    operations = [
        migrations.AlterField(
            model_name='tbl_customer',
            name='cust_contact',
            field=models.CharField(blank=True, max_length=15, null=True),
        ),
    ]
