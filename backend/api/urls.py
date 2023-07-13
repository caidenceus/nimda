from django.urls import path
from . import views


urlpatterns = [
    path('', views.get_routes, name='routes'),
    path('subjects/', views.get_subjects, name='subjects'),
    path('subjects/<str:id>/', views.get_subject, name='subject'),
]
