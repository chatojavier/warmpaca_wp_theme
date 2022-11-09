
/** -------------------------
* Own Plug-in Instagram
----------------------------- */

// get data from facebook API
// async function getIgData(limit, userToken) {
// 	const igBusinessAccount = "17841405442443409";
// 	const apiVersion = "v12.0";
// 	const fields =
// 		"id,comments_count,like_count,media_product_type,thumbnail_url,media_url,permalink,caption";

// 	const url = `https://graph.facebook.com/${apiVersion}/${igBusinessAccount}/media?fields=${fields}&limit=${limit}&access_token=${userToken}`;

// 	return await fetch(url)
// 		.then(res => res.json())
// 		.then(data => data.data)
// 		.catch(err => console.error("Error Insta Fetch: ", err.message));
// }

// async function igFeedSquare(igFeedContainer, nrSquares, userToken) {
// 	const igData = await getIgData(nrSquares, userToken);
// 	const igSquares = igData
// 		.map(itemData => {
// 			const caption = itemData.caption;
// 			const commentsCount = itemData.comments_count;
// 			const id = itemData.id;
// 			const likeCount = itemData.like_count;
// 			const mediaProductType = itemData.media_product_type;
// 			const mediaUrl = itemData.media_url;
// 			const permalink = itemData.permalink;
// 			const haveComments = function() {
// 				if (commentsCount > 0) {
// 					return `<div class="insta-container__counters__comments">
// 							<i class="far fa-comment"></i>
// 							<span class="counter">${commentsCount}</span>
// 						</div>`;
// 				} else {
// 					return "";
// 				}
// 			};
// 			return `
// 			<div id="${id}" class="insta-container__item square">
// 				<a href="${permalink}" target="_blank">
// 					<figure>
// 						<div class="insta-container__img">
// 							<img src="${mediaUrl}" alt="${caption}">
// 						</div>
// 						<div class="insta-container__over square">
// 							<div class="insta-container__counters">
// 								<div class="insta-container__counters__likes">
// 									<i class="far fa-heart"></i>
// 									<span class="counter">${likeCount}</span>
// 								</div>
// 								${haveComments()}
// 							</div>
// 						</div>
// 					</figure>
// 				</a>
// 			</div>
// 		`;
// 		})
// 		.join("");

// 	const getSocialIcons = `<div class="social-icons">
//             <a href="https://www.facebook.com/qatalpaca" target="_blank"><i class="fab fa-facebook-f"></i></a>
//             <a href="https://www.instagram.com/qatalpaca/" target="_blank"><i class="fab fa-instagram"></i></a>
//         </div>`;

// 	igFeedContainer.innerHTML = igSquares + getSocialIcons;
// }

// var igContainer = document.querySelector(".insta-container");
// var nroPubs = 4;
// var token =
// 	"EAAIp7OeLp7EBAPXvUVT7RZCwTIn8rFxcWRfFqVlYdXYh5TP2hQBIjGZCeIWwsONilXmbh8oTXUdqW5OVQzZAiMmZC8aGb8AnwJ5h1OBPJ7DeaHFVnb8Ep1OKO6xH65hiTcWjG9CinAzpnUtw4dsnrwpf762qrwTZB98acK3NvWhAy0LE2U7ZBTJ4pdTGcQyp0ZD";

// igFeedSquare(igContainer, nroPubs, token);
