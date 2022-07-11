document.getElementById('my_form').onsubmit = function(){
    //파트1. 여기서 this는 'my_form'을 의미합니다.
    var name = this.name.value
    var sex = this.sex.value
    var town = this.town.value
    var content = name + ", " + sex + ", " + town

    //파트2. 새로운 <p> 태그를 하나 생성하여 body에 추가합니다.
    var p = document.createElement('p')
    p.textContent = content // 새로 만든 태그의 내용 지정하기
    document.getElementsByTagName('body')[0].appendChild(p)

    //파트3. input에 쓰여있던 모든 데이터를 없애줍니다(초기화).
    this.name.value = ""
    this.sex.value = ""
    this.town.value = ""

    //파트4. 제출 이벤트로 인한 새로고침 방지
    return false;
  }