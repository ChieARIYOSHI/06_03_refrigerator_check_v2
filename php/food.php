<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/food.css">
  <link rel="stylesheet" href="../css/hamburger.css">
  <link rel="icon" href="../img/icon.ico">
  <title>冷蔵庫CHECKER</title>
</head>

<body>
  <header>
    <!-- ハンバーガーメニューの表記内容です -->
    <nav class="navi_menu">
      <ul class="menu_items">
        <li class="menu_content"><a href="index.html">トップページ</a></li>
        <li class="menu_content"><a href="https://localhost/06_03_refrigerator_check_v2/php/food.php">冷蔵庫を見る</a></li>
        <li class="menu_content"><a href="search.html">こんだて検索</a></li>
        <li class="menu_content"><a href="history.html">こんだて日記</a></li>
        <!-- <li class="menu_content"><a href="add.new.html">レシピ登録</a></li> -->
      </ul>
      </nav>
      <!-- アイコン --> 
      <div class="navi_icon">
        <span></span>
        <span></span>
        <span></span>
      </div>
  </header>

  <main class="food_main">
    <div class="title">
      <img class="icon" src="../img/icon.png" alt="冷蔵庫のアイコン">
      <h1>冷蔵庫を見る</h1>
    </div>

    <!-- データ出力場所 -->
    <ul id="output"></ul>

    <!-- <div class="food_01">
      <img class="food_01_image" src="">
      <div class="food_01_text">
        <p class="food_01_name">テスト名前</p>
        <p class="food_01_quantity">テスト量</p>
      </div>
    </div> -->

    <a class="edit_btn" href="https://localhost/06_03_refrigerator_check_v2/php/edit.php">中身を編集する</a>
  </main>
  
  <!-- ここからjavascriptです -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase.js"></script>

<script>
  var firebaseConfig = {
    apiKey: "",
    authDomain: "refrigeratorcheckapp-20201126.firebaseapp.com",
    databaseURL: "https://refrigeratorcheckapp-20201126.firebaseio.com",
    projectId: "refrigeratorcheckapp-20201126",
    storageBucket: "refrigeratorcheckapp-20201126.appspot.com",
    messagingSenderId: "975540210223",
    appId: "1:975540210223:web:6dc842b92545cf2011d4da"
  };
  
  firebase.initializeApp(firebaseConfig);
  const db = firebase.firestore().collection('food_database');
  const storage = firebase.storage().ref().child('img_food');
  // const rdb = firebase.firestore().collection('recipe_database');
</script>

<script>
   // 日時をいい感じの形式にする関数
  function convertFromFirestoreTimestampToDatetime(timestamp) {
    const _d = timestamp ? new Date(timestamp * 1000) : new Date();
    const Y = _d.getFullYear();
    const m = (_d.getMonth() + 1).toString().padStart(2, '0');
    const d = _d.getDate().toString().padStart(2, '0');
    const H = _d.getHours().toString().padStart(2, '0');
    const i = _d.getMinutes().toString().padStart(2, '0');
    const s = _d.getSeconds().toString().padStart(2, '0');
    return `${Y}/${m}/${d} ${H}:${i}`;
  };

  db.where('quantity', '>', 0).orderBy('quantity', 'desc').onSnapshot(function (querySnapshot) {
    const foodList = [];
    querySnapshot.docs.forEach(function(doc) {
      const data = {
        id: doc.id,
        data: doc.data(),
      }
      console.log(data);
      foodList.push(data);
    });

    const remindedFood = [];
    foodList.forEach(function(data) {
      console.log(data);
      remindedFood.push(`
        <li id=${data.id} class="food"><a class='food' href="../html/menu.html">
          <div class='food_image'>
            <image src=${data.data.image} width="120px" height="100px">
          </div>
          <div class='food_text'>
            <p>${data.data.name}</p>
            <p>${data.data.quantity} ${data.data.unit}</p>
            <p>購入日： ${convertFromFirestoreTimestampToDatetime(data.data.quality.seconds)}</p>
          </div>
        </a></li>
      `);  
    });  
    $('#output').html(remindedFood);
  });

  // $('#food_02').on('click', function() {
  //   rdb.where('food_02', 'array-contains', 'true').onSnapshot(function(querySnapshot) {
  //     const recipeList = [];
  //     querySnapshot.docs.forEach(function(doc) {
  //     const dataR = {
  //       idR: doc.id,
  //       dataR: doc.data(),
  //     }
  //     console.log(dataR);
  //     recipeList.push(dataR);
  //   });
  // });
</script>

  <!-- Firebaseの情報を記載しています -->
  <!-- <script type="text/javascript" src="../javascript/firebase.js"></script> -->
  <!-- CSSの'display:none'によるページの切り替え情報を記載しています -->
  <!-- <script type="text/javascript" src="../javascript/food.js"></script> -->
  <!-- ハンバーガーメニューの情報を記載しています -->
  <script type="text/javascript" src="../javascript/hamburger.js"></script>
</body>
</html>