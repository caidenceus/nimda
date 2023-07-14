from rest_framework.serializers import ModelSerializer
from .models import Subject, Chapter


class SubjectSerializer(ModelSerializer):
    class Meta:
        model = Subject
        fields = '__all__'


class ChapterSerializer(ModelSerializer):
    class Meta:
        model = Chapter
        fields = '__all__'
