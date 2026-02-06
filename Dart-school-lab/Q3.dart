// Function with one required and one optional parameter
void createTeacher(String name, [String? subject]) {
  if (subject != null) {
    print("Teacher name: $name");
    print("Subject: $subject");
  } else {
    print("Teacher name: $name");
    print("Subject not assigned");
  }
}

void main() {
  createTeacher("Tr. Bertin");
}
