# from django.shortcuts import render

# from django.http import HttpResponse
# from django.template import loader
from django.shortcuts import render
from django.views import generic


class IndexView(generic.TemplateView):
    template_name = 'hello/index.html'

# def index(request):
#     return render(request, 'hello/index.html')
