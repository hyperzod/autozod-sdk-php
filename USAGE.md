# Autozod PHP SDK - Usage Guide

## Overview

The **Autozod PHP SDK** is an official PHP library that provides a simple and convenient way to integrate with the Autozod API. Autozod is a task management and user authentication service that offers automated registration, login, and task management capabilities.

## Features

The SDK provides three main service areas:

1. **Task Management** - Create, list, update, and send notifications for tasks

## Installation

Install the SDK using Composer:

```bash
composer require hyperzod/autozod-sdk-php
```

## Quick Start

### 1. Initialize the Client

```php
<?php

use Hyperzod\AutozodSdkPhp\Client\AutozodClient;
use Hyperzod\AutozodSdkPhp\Enums\EnvironmentEnum;

// Initialize the client with your API key and environment
$client = new AutozodClient($apiKey, EnvironmentEnum::PRODUCTION);

// For development environment
$devClient = new AutozodClient($apiKey, EnvironmentEnum::DEV);
```

### 2. Environment Configuration

The SDK supports two environments:

- **Development**: `EnvironmentEnum::DEV` - Points to `https://www.autozod.dev/api`
- **Production**: `EnvironmentEnum::PRODUCTION` - Points to `https://www.autozod.app/api`

## API Reference

### Task Management

The Task Service provides comprehensive task management capabilities:

#### List Tasks

```php
// List all tasks
$tasks = $client->task->list($params);
```

#### Create a Task

```php
$newTask = $client->task->create($params);
```

#### Update Task Status

```php
$updatedTask = $client->task->updateStatus($params);
```

#### Send Task Notification

```php
$notification = $client->task->sendNotification($params);
```

## Error Handling

The SDK provides comprehensive error handling. All API methods can throw exceptions, so it's important to wrap your calls in try-catch blocks:

```php
use Hyperzod\AutozodSdkPhp\Exception\InvalidArgumentException;

try {
    $client = new AutozodClient($apiKey, EnvironmentEnum::PRODUCTION);

    $tasks = $client->task->list($params);

    foreach ($tasks as $task) {
        echo "Task: " . $task['title'] . "\n";
    }

} catch (InvalidArgumentException $e) {
    echo "Configuration error: " . $e->getMessage();
} catch (Exception $e) {
    echo "API error: " . $e->getMessage();
}
```

### Common Exceptions

- **InvalidArgumentException**: Thrown when invalid parameters are provided (e.g., empty API key, invalid environment)
- **Exception**: General API errors and response validation errors

### API Key Validation

The SDK validates your API key with the following rules:

- Must be a non-empty string
- Cannot contain whitespace characters
- Must be provided during client initialization
