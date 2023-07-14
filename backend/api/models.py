from django.db import models


class Subject(models.Model):
    title = models.CharField(max_length=127)
    subtitle = models.CharField()

    def __str__(self):
        return self.title


class Chapter(models.Model):
    title = models.CharField(max_length=127)
    subtitle = models.CharField()

    subject = models.ForeignKey(Subject, on_delete=models.CASCADE)

    def __str__(self):
        return f'{self.title}.{self.subtitle}'
