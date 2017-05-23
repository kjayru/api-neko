# WEBSERVICE NEKO
==================


[![N|MWPROFESIONAL](https://cldup.com/dTxpPi9lDf.thumb.png)](https://miwebprofesional.com)

Se detallan los servicios implementados en un 60%.

  - Users 
  - categories 
  - Products
  - buyers
  - transactions
  - plans
  - suscriptions
  

# Carateristicas

  - el formato de interpretacion simple JSON, para todas las peticiones mediante un sistema de validaci´ón 
  - Le informaci´ón generada para las pruebas son aletorias y generada por el sistema


### Peticiones Users
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/users |
| GET | http://{ip}/users/{id}  |
| PUT | http://{ip}/users/{id}  |
| POST | http://{ip}/users |
| DELETE | http://{ip}/users/{id}  |

### Peticiones Products
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/products |
| GET | http://{ip}/products/{id}  |

### Peticiones Categories
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/categories |
| GET | http://{ip}/categories/{id}  |

### Peticiones buyers
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/buyers |
| GET | http://{ip}/buyers/{id}  |



### Peticiones transactions-categories
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/transactions/{id}/categories |

### Peticiones products-categories
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/products/{id}/categories |

### Peticiones products-transactions
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/products/{id}/transactions |

### Peticiones products-buyers
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/products/{id}/buyers |

### Peticiones categories-products
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/categories/{id}/products |

### Peticiones categories-products
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/categories/{id}/products |

### Peticiones categories-buyers
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/categories/{id}/buyers |

### Peticiones buyers-categories
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/buyers/{id}/categories |

### Peticiones buyers-products
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/buyers/{id}/products |

### Peticiones buyers-transactions
| Tipo | url |
| ------ | ------ |
| GET | http://{ip}/buyers/{id}/transactions |

License
----

MIT




