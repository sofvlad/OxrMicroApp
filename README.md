# Open Exchange Rates Micro App

Micro service by Yii 2.0 to get data from the [Open Exchange Rates](https://docs.openexchangerates.org/reference/api-introduction)

## Features
* Yii as a Micro-framework
* Docker compose support
* ENV support
* DTO objects and builders
* HTTP Client class and easily extensible request classes

## Clone repo
```
git clone https://github.com/sofvlad/OxrMicroApp
```

## Docker Deploy
> [!NOTE]
> For local deploy you need add `127.0.0.1 oxr.local` into hosts file
```
docker-compose build
docker-compose up
```

## Configurate
1. Register to https://openexchangerates.org/signup (You can use free plan)
2. Add `App ID` to `OPENEXCHANGERATES_APP_ID` in .env file

## Implemented Endpoints
- [x] /latest
- [ ] /historical/*.json
- [ ] /currencies.json
- [ ] /time-series.json
- [ ] /convert
- [ ] /ohlc.json
- [ ] /usage.json
