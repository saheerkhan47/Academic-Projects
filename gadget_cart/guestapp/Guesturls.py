from django.urls import path
from . import views

urlpatterns = [
    path('', views.index),
    path('login/', views.login, name="login"),
    path('customerreg/', views.customerreg, name='customerreg'),
    path('forgotpassword/', views.forgotpassword, name='forgotpassword'),


]
