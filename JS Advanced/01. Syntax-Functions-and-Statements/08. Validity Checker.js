function solve(cords) {
    /*
        Using mathematical formula for distance validation provided from:
        https://intl.siyavula.com/read/maths/grade-10/analytical-geometry/08-analytical-geometry-01
    
    */
    function ValidityCheck(x1, y1, x2, y2) {
        let distance = Math.sqrt(
            Math.pow(x1 - x2, 2) + Math.pow(y1 - y2, 2)
        );
        console.log(
            `{${x1}, ${y1}} to {${x2}, ${y2}} is ${distance % ~~distance ? 'invalid' : 'valid'}`
        );
    }
    ValidityCheck(cords[0], cords[1], 0, 0);
    ValidityCheck(cords[2], cords[3], 0, 0);
    ValidityCheck(cords[0], cords[1], cords[2], cords[3]);
}

solve([3, 0, 0, 4]);
/*
{3,0} to {0,0} is valid
{0,4} to {0,0} is valid
{3,0} to {0,4} is valid
 */
solve([2, 1, 1, 1]);
/*
{2,1} to {0,0} is invalid
{1,1} to {0,0} is invalid
{2,1} to {1,1} is valid
*/