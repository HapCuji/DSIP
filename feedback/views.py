from django.shortcuts import render
from django.http import HttpResponse
from .forms import ContactForm
from .generator import *


def feedback(request):
    if request.POST:
        form = ContactForm(request.POST)
        # Если форма прошла валидацию
        if form.is_valid():
            cd = form.cleaned_data
            # ... сохранение в базу, к примеру
            # здесь мы просто выведем результат на экран
            new_buzz = {cd['message1'], cd['message2'], cd['message3'], cd['message4']}
            if cd['email']:
                return HttpResponse(
                    'Ваше имя: %s - Почта для жалоб: %s <br><br>  Абра-кадабра: %s' %
                    (cd['name'], cd['email'], generate_buzz(new_buzz)))
            else:
                return HttpResponse(
                    'Ваше имя: %s <br><br>  Набор слов: %s' %
                    (cd['name'], generate_buzz(new_buzz)))
    else:
        form = ContactForm()
    return render(request, 'feedback.html', {'form': form})
