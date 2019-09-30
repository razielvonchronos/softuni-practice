function solve(params) {
  params.sort((a, b) => a.length - b.length || a.localeCompare(b))
  return params.join('\n');
}

console.log(
  solve(
    ['Isacc',
      'Theodor',
      'Jack',
      'Harrison',
      'George']
  )
)