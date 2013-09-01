<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

    "accepted"         => ":attribute 需要被同意.",
    "active_url"       => ":attribute 不是一个有效的URL.",
    "after"            => ":attribute 必须是一个大于 :date 的日期.",
    "alpha"            => ":attribute 只能包含字母.",
    "alpha_dash"       => ":attribute 只能包含字母、数字和中划线",
    "alpha_num"        => ":attribute 只能包含字母和数字.",
    "before"           => ":attribute 必须是一个小于 :date 的日期.",
    "between"          => array(
        "numeric" => ":attribute 应该在 :min - :max 范围内.",
        "file"    => ":attribute 大小应该在 :min - :max 范围内.",
        "string"  => ":attribute 长度应该在 :min - :max 范围内.",
    ),
    "confirmed"        => ":attribute 与 重复:attribute 不同.",
    "date"             => ":attribute 不是一个有效的日期.",
    "date_format"      => ":attribute 不符合格式 :format.",
    "different"        => ":attribute 与 :other 不能相同.",
    "digits"           => ":attribute 只能为 :digits 数字.",
    "digits_between"   => ":attribute 应该为 :min - :max 范围的数字.",
    "email"            => ":attribute 不是一个有效的邮箱地址.",
    "exists"           => ":attribute 已存在.",
    "image"            => ":attribute 只能为图像.",
    "in"               => ":attribute 不在有效范围内.",
    "integer"          => ":attribute 只能是整数.",
    "ip"               => ":attribute 不是一个有效的IP地址.",
    "max"              => array(
        "numeric" => ":attribute 不能大于 :max.",
        "file"    => ":attribute 需要小于 :max KB.",
        "string"  => ":attribute 不能大于 :max 个字符.",
    ),
    "mimes"            => ":attribute 只能为 :values 类型.",
    "min"              => array(
        "numeric" => ":attribute 应该大于 :min.",
        "file"    => ":attribute 应该大于 :min KB.",
        "string"  => ":attribute 应该大于 :min 个字符.",
    ),
    "not_in"           => ":attribute 不在有效范围内.",
    "numeric"          => ":attribute 只能为数字.",
    "regex"            => ":attribute 格式不正确.",
    "required"         => ":attribute 不可为空.",
    "required_if"      => "当 :other 的值为 :value 时, :attribute 为必填内容.",
    "required_with"    => "当 :values 不为空时, :attribute 也不可为空.",
    "required_without" => "当 :values 为空时, :attribute 不可为空.",
    "same"             => ":attribute 应该与 :other 相同.",
    "size"             => array(
        "numeric" => ":attribute 应该为 :size 位数.",
        "file"    => ":attribute 应该为 :size KB.",
        "string"  => ":attribute 应该为 :size 个字符.",
    ),
    "unique"           => ":attribute 已经被使用.",
    "url"              => ":attribute 格式不正确.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
        'email'             =>  '电子邮箱',
        'username'          =>  '用户名',
        'password'          =>  '密码',
        'repeat-password'   =>  '重复密码',
    ),

);
