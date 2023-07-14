from rest_framework.response import Response
from rest_framework.decorators import api_view
from .models import Subject, Chapter
from .serializers import SubjectSerializer, ChapterSerializer


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
    """Get all subject in the Subjects table.

    :param request: API request object.
    :returns: JSON response containing list of subjects.
    """
    subjects = Subject.objects.all()
    serializer = SubjectSerializer(subjects, many=True)
    return Response(serializer.data)


@api_view(['GET'])
def get_subject(request, id):
    """Get a subject by ID.
    
    :param request: API request object.
    :param id: ID of subject to get data for.
    :returns: JSON response containing dictionary of subject.
    """
    subject = Subject.objects.get(id=id)
    serializer = SubjectSerializer(subject, many=False)
    return Response(serializer.data)


@api_view(['GET'])
def get_chapters(request, id):
    """Get all chapters associated with a subject.
    
    :param request: API request object.
    :param id: ID of the subject to get chapters for.
    :returns: JSON response containing list of chapters associated with subject.
    """
    subject = Subject.objects.get(id=id)
    subject_serial = SubjectSerializer(subject, many=False)
    subject_title = subject_serial.data['title']

    chapters = Chapter.objects.filter(subject__title__contains=subject_title)
    chapter_serial = ChapterSerializer(chapters, many=True)
    return Response(chapter_serial.data)


@api_view(['GET'])
def get_chapter(request, s_id, c_id):
    """Get a chapter by ID.

    :param request: API request object.
    :param s_id: Subject id associated with chapter to get.
        Has no function, only used for continuity.
    :param c_id: ID of the chapter to get chapters for.
    :returns: JSON response containing chapter.
    """
    chapter = Chapter.objects.get(id=c_id)
    chapter_serial = ChapterSerializer(chapter, many=False)
    return Response(chapter_serial.data)
