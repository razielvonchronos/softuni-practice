function solve(worker) {
  let water = worker.dizziness ? 0.1 * worker.weight * worker.experience : 0;
  worker.levelOfHydrated += water;
  worker.dizziness = false;
  return worker;
}



let worker = {
  weight: 95,
  experience: 3,
  levelOfHydrated: 0,
  dizziness: false
}
solve(worker)
console.log(worker);