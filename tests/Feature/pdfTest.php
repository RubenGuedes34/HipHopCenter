<?php

namespace Tests\Feature;
use DateTime;
use Stripe\Invoice;
use Tests\TestCase;

class pdf extends TestCase
{
    public function generateInvoice($username, $name, $streetName, $zipcode, $email)
    {
        $invoice = new Invoice();
        $invoice->username = $username;
        $invoice->name = $name;
        $invoice->streetName = $streetName;
        $invoice->zipcode = $zipcode;
        $invoice->email = $email;
        $invoice->date = new DateTime();
        return $invoice;
    }

    public function testGenerateInvoice()
    {
        // Arrange
        $username = 'Ruben';
        $name = 'Ruben Guedes';
        $streetName = 'Porto';
        $zipcode = '4925-340';
        $email = 'rubenguedes34@gmail.com';

        // Act
        $invoice = $this->generateInvoice($username, $name, $streetName, $zipcode, $email);

        // Assert
        $this->assertEquals($username, $invoice->username);
        $this->assertEquals($name, $invoice->name);
        $this->assertEquals($streetName, $invoice->streetName);
        $this->assertEquals($zipcode, $invoice->zipcode);
        $this->assertEquals($email, $invoice->email);
        $this->assertNotEmpty($invoice->date);
    }
}