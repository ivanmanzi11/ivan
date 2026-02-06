// By using await to load students and print count
class Student {
  String name;
  int age;

  Student(this.name, this.age);
}

Future<List<Student>> loadStudents() async {
  await Future.delayed(Duration(seconds: 2));

  return [
    Student("Bertin", 18),
    Student("Bwiza", 19),
    Student("Anitha", 20),
  ];
}

void main() async {
  List<Student> students = await loadStudents();
  print("Number of students loaded: ${students.length}");
}
