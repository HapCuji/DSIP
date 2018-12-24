"""Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf"""
from django.conf.urls import url
from contact import views

urlpatterns = [
   url(r'^$', views.contact, name='contact'),
]
