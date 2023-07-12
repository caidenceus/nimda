from django.shortcuts import render
from django.http import JsonResponse


def get_routes(request):
    routes = [
        {
            'Endpoint': '/subjects/',
            'method': 'GET',
            'body': None,
            'description': 'Get an array of subjects'
        }
    ]

    return JsonResponse(routes, safe=False)
