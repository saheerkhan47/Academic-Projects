# Generated by Django 4.1 on 2024-01-05 05:05

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Tbl_login',
            fields=[
                ('loginid', models.AutoField(primary_key=True, serialize=False)),
                ('username', models.CharField(max_length=25)),
                ('password', models.CharField(max_length=25)),
                ('role', models.CharField(max_length=25)),
            ],
        ),
    ]
