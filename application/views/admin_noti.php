<div class="well">
<form action="/admin/noti_upload" method="post">
  <select name="type">
    <option value="0">노티 타입 선택</option>
    <option value="1">테스트</option>
    <option value="2">공지사항</option>
    <option value="3">개인노티(회원 특정 필요)</option>
  </select>
  <span>*공지사항은 모든 회원에게 노티가 갑니다 </span>
  <br>
  <input type="text" placeholder="노티의 구분 이름" name="title">
  <br>
  <input type="text" placeholder="사람들에게 보여질 내용" name="content">
  <br>
  <input type="text" placeholder="노티 클릭시 이동할 경로" name="target">
  <input type="text" placeholder="특정회원(개인노티만)" name="person">
  <button type="submit">업로드</button>
</form>
</div>
