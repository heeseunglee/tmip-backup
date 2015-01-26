<?php
    $user_model = \User::find($user['id']);
?>

안녕하세요 {{ $user['name_kor'] }}님,

@if($user_model->userable() == 'Student')
    학생 회원 가입을 축하합니다!
@elseif($user_model->userable() == 'Instructor')
    교수진 회원 가입을 축하합니다!
@elseif($user_model->userable() == 'Hr')
    인사담당자 회원 가입을 축하합니다!
@elseif($user_model->userable() == 'Consultant')
    컨설턴트 회원 가입을 축하합니다!
@endif

회원님은 {{ strftime('%Y-%m-%d', strtotime($user['created_at'])) }}부로 더만다린 TMIP의 회원으로 하기와 같이 등록되었습니다.

id : {{ $user['account_email'] }}

password : {{ $random_password }}

<a href="http://tmip.themandarin.co.kr">http://tmip.themandarin.co.kr</a>에 방문하시어 암호 변경 및 인적사항 등록을 진행해 주시기 바랍니다.

TMIP 사용중 문의사항이 있으실 경우 <a href="mailto:dev&#64;themandarin.co.kr"></a>dev&#64;themandarin.co.kr 로 문의 주시기 바랍니다.

{{ date('%Y-%m-%d') }}, 더만다린 주식회사.