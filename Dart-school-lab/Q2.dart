// Function with named parameters (name and age)
void createStudent({required String name, required int age}) {
  print("Student name: $name");
  print("Student age: $age");
}

void main() {
  createStudent(name: "Bertin", age: 23);
}
