from rest_framework.response import Response
from rest_framework.decorators import api_view
from .models import Subject
from .serializers import SubjectSerializer


@api_view(['GET'])
def get_routes(request):
    routes = [{
        'Endpoint': '/subjects/',
        'method': 'GET',
        'body': None,
        'description': 'Get an array of subjects'
    }]
    return Response(routes)


@api_view(['GET'])
def get_subjects(request):
    subjects = Subject.objects.all()
    serializer = SubjectSerializer(subjects, many=True)
    return Response(serializer.data)


@api_view(['GET'])
def get_subject(request, id):
    subjects = Subject.objects.get(id=id)
    serializer = SubjectSerializer(subjects, many=False)
    return Response(serializer.data)
