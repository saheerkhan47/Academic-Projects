from django.urls import path
from . import views
from .views import ExportExcelStudent, ExportExcelCustomer

urlpatterns = [
    path('index/', views.index, name="index"),
    path('district/', views.district, name='district'),
    path('location/', views.location, name='location'),
    path('category/', views.category, name='category'),
    path('product/', views.product, name='product'),
    path('editdistrict/<id>/', views.editdistrict, name='editdistrict'),
    path('deletedistrict/<id>/', views.deletedistrict, name='deletedistrict'),
    path('editlocation/<id>/', views.editlocation, name='editlocation'),
    path('deletelocation/<id>/', views.deletelocation, name='deletelocation'),
    path('filllocation/', views.filllocation, name='filllocation'),
    path('deletecategory/<id>/', views.deletecategory, name='deletecategory'),
    path('editcategory/<id>/', views.editcategory, name='editcategory'),
    path('editproduct/<id>/', views.editproduct, name='editproduct'),
    path('deleteproduct/<id>/', views.deleteproduct, name='deleteproduct'),
    path('fillproduct/', views.fillproduct, name='fillproduct'),
    path('orderdetails/', views.orderdetails, name='orderdetails'),
    path('fillbillno/', views.fillbillno, name='fillbillno'),
    path('billdetails/<billno>/', views.billdetails, name='billdetails'),
    path('categorypie/', views.categorypie, name='categorypie'),
    path('sendmail/<id>', views.sendmail, name='sendmail'),
    path('export_excel/', ExportExcelStudent.as_view(), name='export_excel'),
    path('dateexcel/', views.dateexcel, name='dateexcel'),
    path('locationpie/', views.locationpie, name='locationpie'),
    path('loccustpie/', views.loccustpie, name='loccustpie'),
    path('proexcel/', views.proexcel, name='proexcel'),
    path('logout/', views.logout, name='logout'),
    path('custdetails/', views.custdetails, name='custdetails'),
    path('export_cust/', ExportExcelCustomer.as_view(), name='export_cust'),
    path('product_pie/', views.product_pie, name='product_pie'),
    path('location_customers_pie/', views.location_customers_pie, name='location_customers_pie'),



]
