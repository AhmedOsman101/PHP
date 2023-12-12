// function onlyDuplicates(str) {
// 	let counts;
// 	let result = "";
// 	str = str.toLowerCase().split("");
// 	counts = str.reduce((prev, curr) => {
// 		prev[curr] = (prev[curr] || 0) + 1;
// 		return prev;
// 	}, {});
//     for (const i in counts) {
//         if (Object.hasOwnProperty.call(counts, i)) {
//             const element = counts[i];
//             console.log();
//         }
//     }
// 	for (let [key, value] of Object.entries(counts)) {
// 		if (value > 1) {
// 			result += key.repeat(value);
// 		}
// 	}
// 	return result;
// }
// let str = "abasSAfsdf";
console.log(onlyDuplicates("abccdefee"));
function onlyDuplicates(str) {
	let counts = Array.from(str.toLowerCase()).reduce((acc, char) => {
		acc[char] = (acc[char] || 0) + 1;
		return acc;
	}, {});
	let res = "";
	for (let char of str) {
		if (counts[char.toLowerCase()] > 1) {
			res += char;
		}
	}
	return res;
}
