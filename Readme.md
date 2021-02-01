# PHP [SERPRO](https://devserpro.github.io/apiserpro/)

### Instalação

```bash
$ composer require jeidison/serpro-php
```

### Como usar

- Consulta de CPF

```php
...
use Jeidison\SerproPHP\CpfConsultation\ConsultCpfParameter;
use Jeidison\SerproPHP\SerproPHP;

$parameter = ConsultCpfParameter::new();
$parameter->setConsumerKey('SUA CONSUMER KEY');
$parameter->setConsumeSecret('SUA CONSUMER SECRET');
$parameter->setCpf('40442820135');
$response = SerproPHP::new()->consultCpf($parameter);

// métodos disponíveis
$response->getResult();
$response->isSuccess();
$response->toJson();
$response->toArray();
$response->toObject();
```

// Exemplo de resposta
```json
{
  "ni":"40442820135",
  "nome":"Nome do CPF 404.428.201-35",
  "situacao":
  {
    "codigo":"0",
    "descricao":"Regular"
  }
}  
```

- DataValid

```php
...
use Jeidison\SerproPHP\SerproPHP;
use Jeidison\SerproPHP\DataValid\Address;
use Jeidison\SerproPHP\DataValid\Affiliation;
use Jeidison\SerproPHP\DataValid\CNH;
use Jeidison\SerproPHP\DataValid\DataValidParameter;
use Jeidison\SerproPHP\DataValid\Document;

$cnh = CNH::new()
        ->setFirstCnhDate('9999-99-05')
        ->setCategory('AB')
        ->setExpirationDate('9999-99-99')
        ->setLastEmissionDate('9999-99-99')
        ->setNumber('9999')
        ->setNumberForeign('1')
        ->setSituationCode('1');

    $affiliation = Affiliation::new()
        ->setFatherName('XXXX XXXX XXXX')
        ->setMotherName('XXXX XXXX XXXX');

    $address = Address::new()
        ->setNumber('999')
        ->setAddress('XXX XXX XXX')
        ->setCity('XXXX')
        ->setNeighborhood('XXXXX')
        ->setUf('SP')
        ->setZipCode('999999');

    $document = Document::new()
        ->setNumber('9999999')
        ->setDispatchingBody('SSP')
        ->setDispatchingUf('SP')
        ->setType('1');

    $parameter = DataValidParameter::new()
        ->setConsumerKey('SUA CONSUMER KEY')
        ->setConsumeSecret('SUA CONSUMER SECRET')
        ->setCnh($cnh)
        ->setAffiliation($affiliation)
        ->setAddress($address)
        ->setDocument($document)
        ->setName('xxxx xxxx xxxx')
        ->setCpf('111')
        ->setBirthDate('9999-99-99')
        ->setSex('M')
        ->setCpfSituation('regular')
        ->setNationality('1');

    $response = SerproPHP::new()->dateValidate($parameter);
    echo $response->toJson();
```

// Exemplo de resposta
```json
{
   "nome":true,
   "sexo":true,
   "nacionalidade":true,
   "filiacao":{
      "nome_mae":true,
      "nome_mae_similaridade":1.0,
      "nome_pai":true,
      "nome_pai_similaridade":1.0
   },
   "cnh":{
      "nome":true,
      "categoria":true,
      "nome_similaridade":1.0,
      "numero_registro":true,
      "data_primeira_habilitacao":true,
      "data_validade":true,
      "data_ultima_emissao":true,
      "codigo_situacao":false
   },
   "documento":{
      "tipo":true,
      "numero":true,
      "numero_similaridade":1.0,
      "orgao_expedidor":true,
      "uf_expedidor":true
   },
   "endereco":{
      "logradouro":false,
      "numero":false,
      "bairro":false,
      "cep":true,
      "municipio":true,
      "uf":true,
      "logradouro_similaridade":0.6666666666666667,
      "numero_similaridade":0.6,
      "bairro_similaridade":0.6666666666666667,
      "municipio_similaridade":1.0
   },
   "cpf_disponivel":true,
   "nome_similaridade":1.0,
   "data_nascimento":true,
   "situacao_cpf":true
}
```

### Consulta de CNPJ

Não implementada


### Consulta de NFe

Não implementada

### Vio

Não implementada