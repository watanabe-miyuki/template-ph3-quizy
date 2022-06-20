// 十問js繰り返し(色の変更、解説表示、シャッフル）
const js_getCount = document.getElementById('js-getCount');
const count = js_getCount.dataset.count;
// console.log(count)
for (let j = 0; j < count; j++) {
js_motion(j);
};

// ////////色の変化＆解説表示////////
function js_motion(number) {
  // js-nonCorrectBox 非表示
document.querySelector(`.question-correctBox${number}`).style.display ="none";
document.querySelector(`.question-nonCorrectBox${number}`).style.display ="none";

  // question-list-item-js-nonCorrectをクリック→
  // .question-list-item-js-nonCorrect(css)適応＆js-nonCorrectBox非表示を解除＆クリックは一度
document.getElementById(`question-list${number}`).addEventListener('click', e => {
    if (e.target.className === 'question-list-item-nonCorrect') {
    e.target.classList.add('question-list-item-changing-color-nonCorrect');
    document.querySelector(`.question-list-item-correct${number}`).classList.add('question-list-item-changing-color-correct');
    document.querySelector(`.question-nonCorrectBox${number}`).style.display ="block";
    }else if (e.target.className === `question-list-item-correct${number}`) {
    e.target.classList.add('question-list-item-changing-color-correct');
    document.querySelector(`.question-correctBox${number}`).style.display ="block";
    }},
    { once: true });
  }
