<?php
declare(strict_types=1);

/**
 * Path: /tests/BoutiqueBridgeTest.php
 * Filename: BoutiqueBridgeTest.php | Version: v7.8.0
 * Agent: Architect-K
 * Status: Production
 * Logic: PHPUnit tests for the BoutiqueBridge trait
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use Site\Traits\BoutiqueBridge;

class MockField
{
    use BoutiqueBridge;

    private string $value;

    public function __construct(string $value = '')
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}

class BoutiqueBridgeTest extends TestCase
{
    public function testToAiryWithEmptyValueReturnsFallback(): void
    {
        $field = new MockField('');
        $this->assertEquals('py-airy-md', $field->toAiry());
    }

    public function testToAiryWithValueReturnsCorrectClasses(): void
    {
        $field = new MockField('xl');
        $this->assertEquals('pt-airy-xl pb-airy-xl', $field->toAiry());
    }

    public function testToThemeWithKnownValues(): void
    {
        $field = new MockField('oceanic');
        $this->assertEquals('bg-oceanic-dark text-canvas', $field->toTheme());

        $field2 = new MockField('gold');
        $this->assertEquals('bg-warm-gold text-ink', $field2->toTheme());
    }

    public function testToThemeWithUnknownValueReturnsFallback(): void
    {
        $field = new MockField('non-existent');
        $this->assertEquals('bg-canvas text-ink', $field->toTheme());
    }

    public function testToIconWithEmptyValue(): void
    {
        $field = new MockField('');
        $this->assertEquals('', $field->toIcon());
    }

    // toIcon() with actual icon requires kirby() helper mock which might be complex.
    // For now, testing the error fallback is a good start.
}
