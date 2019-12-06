function solve() {
  const levels = {
    underweight: 18.5,
    normal: 25,
    overweight: 30,
  }
  const [user_name, user_age, user_weight, user_height] = Object.values(arguments);

  let bmi_value = Math.round(user_weight / Math.pow(user_height / 100, 2));
  let bmi_status = Object.keys(levels).filter(x => bmi_value < levels[x])[0];
  let user = {
    name: user_name,
    personalInfo: {
      age: user_age,
      weight: user_weight,
      height: user_height
    },
    BMI: bmi_value,
    status: bmi_status || 'obese',
  }

  if (!bmi_status)
    user['recommendation'] = 'admission required';
  return user;
}

console.log(
  solve('Peter', 29, 50, 165),
  solve('Peter', 29, 65, 165),
  solve('Peter', 29, 80, 165),
  solve('Peter', 29, 90, 165)
)