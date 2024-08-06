from django.urls import path
from . import views

urlpatterns = [
    path('cindex/', views.cindex, name="cindex"),
    path('viewproduct/<id>/', views.viewproduct, name="viewproduct"),
    path('quickview/<id>/', views.quickview, name="quickview"),
    path('cartbuy/<id>/', views.cartbuy, name="cartbuy"),
    path('cartview/', views.cartview, name="cartview"),
    path('custprofile/', views.custprofile, name="custprofile"),
    path('deletecart/<id>/', views.deletecart, name="deletecart"),
    path('updateqty/', views.updateqty, name="updateqty"),
    path('makepayment/', views.makepayment, name='makepayment'),
    path('placeorder/', views.placeorder, name='placeorder'),
    path('editprofile/', views.editprofile, name='editprofile'),
    path('changepassword/', views.changepassword, name='changepassword'),
    path('logout/', views.logout, name='logout'),
    path('orderview/', views.orderview, name="orderview"),
    path('billview/<billno>', views.billview, name='billview'),






]
