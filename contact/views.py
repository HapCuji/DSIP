from django.shortcuts import render
from django.http import HttpResponse


def contact(request):
    errors = []
    form = {}
    if request.POST:

        form['name'] = request.POST.get('name')
        form['email'] = request.POST.get('email')
        form['message'] = request.POST.get('message')

        if not form['name']:
            errors.append('Заполните имя')
        if '@' not in form['email']:
            errors.append('Введите корректный e-mail')
        if not form['message']:
            errors.append('Введите сообщение')

        if not errors:
            # ... сохранение данных в базу
            return HttpResponse('Спасибо за ваше сообщение!')

    return render(request, 'contact.html', {'errors': errors, 'form': form})
