# 自分の冷蔵庫の中身を管理できる『冷蔵庫チェッカー』のWEBアプリケーション
- データを少しだけアップデートしたかったのですが・・・思う様にphpを使いこなせませんでした。

## プロダクトの紹介
- 一人暮らしで冷蔵庫にある食材を腐らせずに効率的に料理したいと思ってるすべての方に向けたサービスです。
- いつでもどこでも自宅の冷蔵庫の中に「何が」「どれだけ」残っているかを確認でき、そこからおすすめのレシピを提案してくれるアプリケーションを作りました。
- このアプリケーションでフードロス軽減につなげたいなと思っています。

## 工夫した点
- 今回は、前々回の課題【firebase】をアップデートしたくて、冷蔵庫の中身を【書き換える】を操作ができる様にphpで挑戦してみました。
- 【edit.php】から【edit_create.php】にデータを送るところまで、var_dumpで確認できました。
- ここからfirebaseの中身を書き換えたかったのですが、まだできていません。。。
- レビュー会までにもう少し進めるように頑張ります！！

## 反省点
- いっぱいしているように見えますが、今回いじったところはphpのフォルダだけで、その中でもeditと付いている２つのファイルくらいです。なんか、恐縮です・・・。

### (参考)ここは前々回のfirebaseの課題で工夫した点です。
- ①スマホで利用することを想定して、見やすく使いやすいように作成しました。
- ②スマホ上で冷蔵庫の中身を確認できます。
- ③そこから今日のこんだてを検索して、作りたい料理を決定します。
- ④作りたい料理の食材のうち、冷蔵庫の中にないピックアップを選んで、買い物リストが生成されます。
- ⑤買い物が完了したら、自動的に冷蔵庫の中身のリストが反映されるようになります。
- ③〜⑤はまだ完成していませんが、頑張って最後まで完成させたいと思います。
