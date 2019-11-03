
class Company {
   constructor() {
      this.departments = []
   }
   addEmployee(username, salary, position, department) {
      let departments = this.departments;
      if (!username || !salary || !position || !department) {
         throw new Error("Invalid input");
      }
      if (salary < 0) {
         throw new Error(" Invalid input!");
      }

      if (!departments.includes(department)) {
         departments[department] = [];
      }
      let employee = {
         username, salary, position
      }
      departments[department].push(employee);
      return `New employee is hired. Name: ${username}. Position: ${position}`;
   }

   bestDepartment() {
      return this.departments
   }
}

let c = new Company();
c.addEmployee("Stanimir", 2000, "engineer", "Construction");
c.addEmployee("Pesho", 1500, "electrical engineer", "Construction");
c.addEmployee("Slavi", 500, "dyer", "Construction");
c.addEmployee("Stan", 2000, "architect", "Construction");
c.addEmployee("Stanimir", 1200, "digital marketing manager", "Marketing");
c.addEmployee("Pesho", 1000, "graphical designer", "Marketing");
c.addEmployee("Gosho", 1350, "HR", "Human resources");
console.log(c.bestDepartment());
