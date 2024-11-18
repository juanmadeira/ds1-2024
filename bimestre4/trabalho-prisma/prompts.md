# adicionar um proprietário
POST - http://localhost:3000/proprietarios
```json
{
  "nome": "Juan",
  "email": "juan@email.com",
  "endereco": "Rua dos Bobos, Nº0"
},
{
  "nome": "Eduardo Brião",
  "email": "lordewenzel@email.com",
  "endereco": "Rua Tal, Nº1978"
}
```

# deletar um proprietário
DELETE - http://localhost:3000/proprietarios/:id

# buscar um proprietário por nome
GET - http://localhost:3000/proprietarios/search?nome=Juan

# adicionar um produto:
POST - http://localhost:3000/produtos
```json
{
  "desc": "Guitarra Tagima Tw-60 Jazzmaster",
  "qtd": 13,
  "valor": 1040.00,
  "proprietarioId": 1
},
{
  "desc": "Violão Aço Eletroacústico Giannini",
  "qtd": 27,
  "valor": 965.11,
  "proprietarioId": 1
}
```

# deletar um produto
DELETE - http://localhost:3000/produtos/:id