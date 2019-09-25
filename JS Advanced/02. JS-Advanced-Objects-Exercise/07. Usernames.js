function solve(input) {
  let names = new Set(input
    .sort()
    .sort((a, b) => a.length - b.length)
  );
  names.forEach(e => console.log(e))
}

solve([
  'Ashton',
  'Kutcher',
  'Ariel',
  'Lilly',
  'Keyden',
  'Aizen',
  'Billy',
  'Braston'
])