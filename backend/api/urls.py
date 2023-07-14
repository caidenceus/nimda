from django.urls import path
from . import views


urlpatterns = [
    path('', views.get_routes, name='routes'),
    path('subjects/', views.get_subjects, name='subjects'),
    path('subjects/<str:id>/', views.get_subject, name='subject'),
    path('subjects/<str:id>/chapters/', views.get_chapters, name='chapters'),
    path('subjects/<str:s_id>/chapters/<str:c_id>', views.get_chapter, name='chapter')
]
