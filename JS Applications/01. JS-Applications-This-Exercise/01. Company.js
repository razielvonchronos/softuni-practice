
class Company {
   constructor() {
      this.departments = []
   }

   addDepartment(department) {
      let object = {
         name: department,
         employees: []
      };
      this.departments.push(object)
      return object;
   }

   addEmployee(username, salary, position, department) {
      let departments = this.departments;
      if (!username || !salary || !position || !department) {
         throw new Error("Invalid input!");
      }
      if (salary < 0) {
         throw new Error(" Invalid input!");
      }

      let departmentObject = departments.find(x => x.name === department);
      if (!departmentObject)
         departmentObject = this.addDepartment(department)

      let employee = {
         username, salary, position
      }

      departmentObject.employees.push(employee);
      // console.log(`New employee is hired. Name: ${username}. Position: ${position}`);
      return `New employee is hired. Name: ${username}. Position: ${position}`;
   }

   sumAvgSalary(department) {
      let sum = 0
      department.employees.forEach(x => sum += x.salary);
      return sum / department.employees.length;
   }
   bestDepartment() {
      let best = this.departments.sort((a, b) => {
         return this.sumAvgSalary(b) - this.sumAvgSalary(a);
      })[0];
      let avgSalary = this.sumAvgSalary(best).toFixed(2);
      let msg = [];
      msg.push(`Best Department is: ${best.name}`);
      msg.push(`Average salary: ${avgSalary}`);
      best.employees
         .sort((a, b) => a.username.localeCompare(b.username))
         .sort((a, b) => b.salary - a.salary)
         .forEach(e => {
            msg.push(`${e.username} ${e.salary} ${e.position}`)
         });

      return msg.join('\n')
   }
}

function test() {

   assert = {
      equal: (a, b) => {
         if (a !== b) {
            throw new Error(`\n${a}\nto be\n${b}`)
         }
      }
   }

   let c = new Company();

   let actual1 = c.addEmployee("Stanimir", 2000, "engineer", "Human resources");
   let expected1 = "New employee is hired. Name: Stanimir. Position: engineer";
   assert.equal(actual1, expected1);

   c.addEmployee("Pesho", 1500, "electrical engineer", "Construction");
   c.addEmployee("Slavi", 500, "dyer", "Construction");
   c.addEmployee("Stan", 2000, "architect", "Construction");
   c.addEmployee("Stanimir", 1200, "digital marketing manager", "Marketing");
   c.addEmployee("Pesho", 1000, "graphical designer", "Marketing");
   c.addEmployee("Gosho", 1350, "HR", "Human resources");

   let act = c.bestDepartment();
   let exp = "Best Department is: Human resources\nAverage salary: 1675.00\nStanimir 2000 engineer\nGosho 1350 HR";
   assert.equal(act, exp);
}

test();