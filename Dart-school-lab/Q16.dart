// Async function loadStudents
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

void main() {
  // No output 
}
