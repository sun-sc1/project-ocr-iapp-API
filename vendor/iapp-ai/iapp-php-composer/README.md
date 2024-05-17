iApp-AI PHP Composer Library
=========================
iApp AI PHP composer library for easier AI implementation.

Free software: MIT license

Documentation: https://docs.iapp.co.th

Request API Key: https://ai.iapp.co.th

Features
--------
* iApp Image Recognition Service
  * Thai National ID Card OCR
  * Passport OCR
  * Thai Vehicle License Plate
  * Book Bank OCR
  * Passport OCR [NEW]
  * Face Verification (Comparison)
  * Face Recognition
  * Face Detection
  * Face Passive Liveness Detection
  * Document OCR [NEW]
  * Power Meter OCR
  * Water Meter OCR
  * Image Background Remover
* iApp Thai NLP Service
  * Thai Auto Question Answering
  * Question Generator
  * Thai-English Machine Translation [NEW]
  * Thai Text Parser
  * Thai Text Summarization
* iApp Voice and Speech Service
  * Thai Automatic Speech Recognition (ASR) [NEW]
  * Thai Text to Speech (TTS)
  * Music Source Seperator
  * Noise Subtraction

How to use it?
--------
This project using composer.
```bash
composer require iapp-ai/iapp-php-composer
```

Testing
--------
Testing all methods.
```bash
./vendor/bin/phpunit
```

Testing a single method.s
```bash
./vendor/bin/phpunit --filter testFaceDetectSingle
```