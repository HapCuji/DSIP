from django import forms


class ContactForm(forms.Form):
    name = forms.CharField(label='Имя')
    email = forms.EmailField(label='Почта', required=False)
    message1 = forms.CharField(label='Набор слов 1', widget=forms.Textarea)
    message2 = forms.CharField(label='Набор слов 2', widget=forms.Textarea)
    message3 = forms.CharField(label='Набор слов 3', widget=forms.Textarea, required=False)
    message4 = forms.CharField(label='Набор слов 4', widget=forms.Textarea, required=False)
