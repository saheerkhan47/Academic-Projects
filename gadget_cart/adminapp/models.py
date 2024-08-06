from django.db import models


class Tbl_district(models.Model):
    dist_id = models.AutoField(primary_key=True)
    dist_name = models.CharField(max_length=50)


class Tbl_location(models.Model):
    loc_id = models.AutoField(primary_key=True)
    loc_name = models.CharField(max_length=25)
    dist_id = models.ForeignKey(Tbl_district, on_delete=models.CASCADE)


class Tbl_category(models.Model):
    cate_id = models.AutoField(primary_key=True)
    cate_name = models.CharField(max_length=25)
    cate_image = models.ImageField()


class Tbl_product(models.Model):
    pro_id = models.AutoField(primary_key=True)
    pro_name = models.CharField(max_length=50)
    pro_price = models.IntegerField(blank=True, null=True)
    pro_stoke = models.IntegerField(blank=True, null=True)
    pro_image = models.ImageField()
    pro_des = models.CharField(max_length=100)
    cate_id = models.ForeignKey(Tbl_category, on_delete=models.CASCADE)
